/***********************************************************************************
 * App Services. This contains the logic of the application organised in modules/objects. *
 ***********************************************************************************/

myApp.services = {

  /////////////////
  // Task Service //
  /////////////////
  tasks: {

    // Creates a new task and attaches it to the pending task list.
    create: function(data) {
      // Task item template.
      var taskItem = ons.createElement(
        '<ons-list-item tappable category="' + myApp.services.categories.parseId(data.category)+ '">' +
          '<label class="left">' +
           '<ons-select id="choose-sel">' +
                '<option value="first"></option>' +
                '<option value="A_faire">A faire</option>' +
                '<option value="En_cours">En cours</option>' +
                '<option value="Complete">Complète</option>' +
              '</ons-select>' +
          '</label>' +
          '<div class="center">' +
              '<div id="title">' +
                '&nbsp ' +
                data.title +
              '</div>' +
              '<div id="deadline">' +
                  '&nbsp &#160 deadline : &nbsp ' +
                  data.deadline +
              '</div>' +
          '</div>' +
          '<div class="right">' +
            '<ons-icon style="color: grey; padding-left: 4px" icon="ion-ios-trash-outline, material:md-delete"></ons-icon>' +
          '</div>' +
        '</ons-list-item>'
      );


      // Store data within the element.
      taskItem.data = data;

      var listId = '#pending-list';

      // Add 'en cours' functionality when the checkbox changes.
            taskItem.data.onCheckboxChange = function(event) {
              myApp.services.animators.swipe(taskItem, function() {
                switch (event.target.value) {
                    case 'En_cours' :
                        listId = '#encours-list';
                        taskItem.data.etat = 'En cours';
                        break;
                    case 'A_faire' :
                        listId = '#pending-list';
                        taskItem.data.etat = 'A faire';
                        break;
                    case 'Complete' :
                        listId = '#completed-list';
                        taskItem.data.etat = 'Complète';
                        break;
                }

                document.querySelector(listId).appendChild(taskItem);
                localStorage.setItem(taskItem.data.title, JSON.stringify(taskItem.data));
              });
            };

            taskItem.addEventListener('change', taskItem.data.onCheckboxChange);


/*
       // Add 'en cours' functionality when the checkbox changes.
            taskItem.data.onCheckboxChange = function(event) {
              myApp.services.animators.swipe(taskItem, function() {
                var listId = (event.target.value == 'En_cours') ? '#encours-list' : '#';
                document.querySelector(listId).appendChild(taskItem);
              });
            };
      taskItem.addEventListener('change', taskItem.data.onCheckboxChange);


       // Add 'a faire' functionality when the checkbox changes.
      taskItem.data.onCheckboxChange = function(event) {
                    myApp.services.animators.swipe(taskItem, function() {
                      var listId = (event.target.value == 'A_faire') ? '#pending-list' : '#';
                      document.querySelector(listId).appendChild(taskItem);
                    });
                  };
      taskItem.addEventListener('change', taskItem.data.onCheckboxChange);

       // Add 'complete' functionality when the checkbox changes.
       taskItem.data.onCheckboxChange = function(event) {
                          myApp.services.animators.swipe(taskItem, function() {
                            var listId = (event.target.value == 'Complete') ? '#completed-list' : '#';
                            document.querySelector(listId).appendChild(taskItem);
                          });
                        };
            taskItem.addEventListener('change', taskItem.data.onCheckboxChange);
*/
      // Add button functionality to remove a task.
      taskItem.querySelector('.right').onclick = function() {
        myApp.services.tasks.remove(taskItem);
        localStorage.removeItem(taskItem.data.title);
      };


      // Add functionality to push 'details_task.html' page with the current element as a parameter.
      taskItem.querySelector('.center').onclick = function() {
        document.querySelector('#myNavigator')
          .pushPage('html/details_task.html',
            {
              animation: 'lift',
              data: {
                element: taskItem
              }
            }
          );
      };

      // Check if it's necessary to create new categories for this item.
      myApp.services.categories.updateAdd(taskItem.data.category);

      // Add the highlight if necessary.
      if (taskItem.data.highlight) {
        taskItem.classList.add('highlight');
      }

      // Insert urgent tasks at the top and non urgent tasks at the bottom.
      /*
      var pendingList = document.querySelector('#pending-list');
      pendingList.insertBefore(taskItem, taskItem.data.urgent ? pendingList.firstChild : null);
      */

       switch (taskItem.data.etat) {
            case 'En cours' :
                listId = '#encours-list';
                break;
            case 'A faire' :
                listId = '#pending-list';
                break;
            case 'Complète' :
                listId = '#completed-list';
                break;
       }

      var bonneList = document.querySelector(listId);

       bonneList.insertBefore(taskItem, taskItem.data.urgent ? bonneList.firstChild : null);

      localStorage.setItem(taskItem.data.title, JSON.stringify(taskItem.data));


    },

    // Modifies the inner data and current view of an existing task.
    update: function(taskItem, data) {
      if (data.title !== taskItem.data.title) {
        // Update title view.

        taskItem.querySelector('#title').innerHTML = data.title;
        //taskItem.querySelector('.center').innerHTML = data.title;
      }

      if (data.category !== taskItem.data.category) {
        // Modify the item before updating categories.
        taskItem.setAttribute('category', myApp.services.categories.parseId(data.category));
        // Check if it's necessary to create new categories.
        myApp.services.categories.updateAdd(data.category);
        // Check if it's necessary to remove empty categories.
        myApp.services.categories.updateRemove(taskItem.data.category);

      }

      if (data.deadline !== taskItem.data.deadline) {
         taskItem.querySelector('#deadline').innerHTML = data.deadline;
      }

      // Add or remove the highlight.
      taskItem.classList[data.highlight ? 'add' : 'remove']('highlight');

        // MODIFICATION 1 DANS LA BDD
       localStorage.removeItem(taskItem.data.title);

      // Store the new data within the element.
      taskItem.data = data;

      // MODIFICATION 2 DANS LA BDD
      localStorage.setItem(taskItem.data.title, JSON.stringify(taskItem.data));

    },

    // Deletes a task item and its listeners.
    remove: function(taskItem) {

      taskItem.removeEventListener('change', taskItem.data.onCheckboxChange);

      myApp.services.animators.remove(taskItem, function() {
        // Remove the item before updating the categories.
        taskItem.remove();
        // Check if the category has no items and remove it in that case.
        myApp.services.categories.updateRemove(taskItem.data.category);
      });
    }
  },

  /////////////////////
  // Category Service //
  ////////////////////
  categories: {

    // Creates a new category and attaches it to the custom category list.
    create: function(categoryLabel) {
      var categoryId = myApp.services.categories.parseId(categoryLabel);

      // Category item template.
      var categoryItem = ons.createElement(
        '<ons-list-item tappable category-id="' + categoryId + '">' +
          '<div class="left">' +
            '<ons-radio name="categoryGroup" input-id="radio-'  + categoryId + '"></ons-radio>' +
          '</div>' +
          '<label class="center" for="radio-' + categoryId + '">' +
            (categoryLabel || 'No category') +
          '</label>' +
        '</ons-list-item>'
      );

      // Adds filtering functionality to this category item.
      myApp.services.categories.bindOnCheckboxChange(categoryItem);

      // Attach the new category to the corresponding list.
      document.querySelector('#custom-category-list').appendChild(categoryItem);
    },

    // On task creation/update, updates the category list adding new categories if needed.
    updateAdd: function(categoryLabel) {
      var categoryId = myApp.services.categories.parseId(categoryLabel);
      var categoryItem = document.querySelector('#menuPage ons-list-item[category-id="' + categoryId + '"]');

      if (!categoryItem) {
        // If the category doesn't exist already, create it.
        myApp.services.categories.create(categoryLabel);
      }
    },

    // On task deletion/update, updates the category list removing categories without tasks if needed.
    updateRemove: function(categoryLabel) {
      var categoryId = myApp.services.categories.parseId(categoryLabel);
      var categoryItem = document.querySelector('#tabbarPage ons-list-item[category="' + categoryId + '"]');

      if (!categoryItem) {
        // If there are no tasks under this category, remove it.
        myApp.services.categories.remove(document.querySelector('#custom-category-list ons-list-item[category-id="' + categoryId + '"]'));
      }
    },

    // Deletes a category item and its listeners.
    remove: function(categoryItem) {
      if (categoryItem) {
        // Remove listeners and the item itself.
        categoryItem.removeEventListener('change', categoryItem.updateCategoryView);
        categoryItem.remove();
      }
    },

    // Adds filtering functionality to a category item.
    bindOnCheckboxChange: function(categoryItem) {
      var categoryId = categoryItem.getAttribute('category-id');
      var allItems = categoryId === null;

      categoryItem.updateCategoryView = function() {
        var query = '[category="' + (categoryId || '') + '"]';

        var taskItems = document.querySelectorAll('#tabbarPage ons-list-item');
        for (var i = 0; i < taskItems.length; i++) {
          taskItems[i].style.display = (allItems || taskItems[i].getAttribute('category') === categoryId) ? '' : 'none';
        }
      };

      categoryItem.addEventListener('change', categoryItem.updateCategoryView);
    },

    // Transforms a category name into a valid id.
    parseId: function(categoryLabel) {
      return categoryLabel ? categoryLabel.replace(/\s\s+/g, ' ').toLowerCase() : '';
    }
  },

  //////////////////////
  // Animation Service //
  /////////////////////
  animators: {

    // Swipe animation for task completion.
    swipe: function(listItem, callback) {
      var animation = (listItem.parentElement.id === 'pending-list') ? 'animation-swipe-right' : 'animation-swipe-left';
      listItem.classList.add('hide-children');
      listItem.classList.add(animation);

      setTimeout(function() {
        listItem.classList.remove(animation);
        listItem.classList.remove('hide-children');
        callback();
      }, 950);
    },

    // Remove animation for task deletion.
    remove: function(listItem, callback) {
      listItem.classList.add('animation-remove');
      listItem.classList.add('hide-children');

      setTimeout(function() {
        callback();
      }, 750);
    }
  },

  ////////////////////////
  // Initial Data Service //
  ////////////////////////
  /*
  fixtures: [
    {
      title: 'Download OnsenUI',
      category: 'Programming',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Install Monaca CLI',
      category: 'Programming',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Star Onsen UI repo on Github',
      category: 'Super important',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Register in the community forum',
      category: 'Super important',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Send donations to Fran and Andreas',
      category: 'Super important',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Profit',
      category: '',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Visit Japan',
      category: 'Travels',
      description: 'Some description.',
      highlight: false,
      urgent: false
    },
    {
      title: 'Enjoy an Onsen with Onsen UI team',
      category: 'Personal',
      description: 'Some description.',
      highlight: false,
      urgent: false
    }
  ]*/

  methodes: {

        initPending: function() {
            if (localStorage.length > 0){
                console.log("taille > 0");
                for (let i = 0; i < localStorage.length; i++){
                    let cle = localStorage.key(i);
                    let data = JSON.parse(window.localStorage.getItem(cle));
                    if (data.etat==='A faire'){
                       myApp.services.tasks.create(data);
                    }
                    //console.log(data);
                }
            }
            else {
              console.log("tailla = 0 on ecrit tout");
              myApp.services.fixtures.forEach(function(data) {
                 myApp.services.tasks.create(data);
                 localStorage.setItem(data.title, JSON.stringify(data));
              });
            }
        },

        initEncours: function() {
            if (localStorage.length > 0){
                console.log("taille > 0");
                for (let i = 0; i < localStorage.length; i++){
                    let cle = localStorage.key(i);
                    let data = JSON.parse(window.localStorage.getItem(cle));
                    if (data.etat==='En cours'){
                       myApp.services.tasks.create(data);
                    }
                    //console.log(data);
                }
            }
        },

        initComplete: function() {
            if (localStorage.length > 0){
                console.log("taille > 0");
                for (let i = 0; i < localStorage.length; i++){
                    let cle = localStorage.key(i);
                    let data = JSON.parse(window.localStorage.getItem(cle));
                    if (data.etat==='Complète'){
                       myApp.services.tasks.create(data);
                    }
                }
            }
        },

/*
          initialisation: function() {
          try {
              if (localStorage.length > 0){
                console.log("taille > 0");
                for (let i = 0; i < localStorage.length; i++){
                    let cle = localStorage.key(i);
                    let data = JSON.parse(window.localStorage.getItem(cle));
                    //console.log(data);
                    myApp.services.tasks.create(data);
                }
              }
              else {
                myApp.services.fixtures.forEach(function(data) {
                   myApp.services.tasks.create(data);
                   localStorage.setItem(data.title, JSON.stringify(data));
                });
              }
              return true;
           } catch(e){
                return false;
           }
          },
*/

          faireSelectBoxCategory: function(page) {

          // on réinitialise la selectbox de catégories
          let box = page.querySelector("#choose-category");

          let optionsExist = box.childNodes;
          optionsExist.forEach(function (value, key) {
               if (value.innerText!='Nouvelle catégorie'){
                 page.querySelector("#choose-category").removeChild(page.querySelector("#choose-category").childNodes[key]);
              }
          });

            // on recupere les catégories existantes
            let catExist=[];
            for (let i = 0; i < localStorage.length; i++){
                let cle = localStorage.key(i);
                let cat = JSON.parse(window.localStorage.getItem(cle)).category;
                console.log('categorie : ');
                console.log(cat);
                if (!(catExist.includes(cat)) && (cat!="")){
                    catExist.push(cat);
                }
            }

            for (let j = 0 ; j<catExist.length;j++){
                let o = document.createElement("option");
                o.setAttribute("id", j);
                o.innerText= catExist[j];
                page.querySelector("#choose-category").childNodes[0].appendChild(o);
            }
          }
  },

  fixtures: [
      {
        title: 'Vous n\'avez aucunes taches encore !',
        category: '',
        description: '',
        highlight: false,
        urgent: false,
        deadline: '',
        etat: 'A faire'
      },
      {
        title: 'Créez-en une !',
        category: '',
        description: 'Some description.',
        highlight: false,
        urgent: false,
        deadline: '',
        etat: 'A faire'
      }
   ]


};
