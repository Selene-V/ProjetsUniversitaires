/***********************************************************************
 * App Controllers. These controllers will be called on page initialization. *
 ***********************************************************************/

myApp.controllers = {

  //////////////////////////
  // Tabbar Page Controller //
  //////////////////////////
  tabbarPage: function(page) {
    // Set button functionality to open/close the menu.
    page.querySelector('[component="button/menu"]').onclick = function() {
      document.querySelector('#mySplitter').left.toggle();
    };

    // Set button functionality to push 'new_task.html' page.
    Array.prototype.forEach.call(page.querySelectorAll('[component="button/new-task"]'), function(element) {
      element.onclick = function() {

        //let listeCategories = myApp.services.methodes.faireSelectBoxCategory();
        document.querySelector('#myNavigator').pushPage('html/new_task.html').then(function(page){
              if (page.matches('#newTaskPage')) {
                myApp.services.methodes.faireSelectBoxCategory(page);
              }
            //});
        });

      };

      element.show && element.show(); // Fix ons-fab in Safari.
    });

    // Set button functionality to delete all item.
    page.querySelector('[component="button/delete-all"]').onclick = function() {
          ons.notification.confirm(
                  {
                    title : 'Suppression de toutes vos tâches',
                    message : 'Êtes vous sur de vouloir supprimer toutes vos tâches ?',
                    buttonLabels: ['Annuler', 'Supprimer']
                  }
                  ).then(function(buttonIndex){
                    if (buttonIndex === 1) {
                        // If 'Supprimer' button was pressed, delete all the task.
                        var listeTaches = page.getElementsByTagName('ons-list-item');
                        for (let i = 0 ; i < listeTaches.length ; i++){
                          myApp.services.tasks.remove(page.getElementsByTagName('ons-list-item')[i]);
                        }
                        localStorage.clear();
                        myApp.services.fixtures.forEach(function(data) {
                            localStorage.removeItem(data.title);
                        });
                    }
                  });
        };


    // Change tabbar animation depending on platform.
    page.querySelector('#myTabbar').setAttribute('animation', ons.platform.isAndroid() ? 'slide' : 'none');
    },


  ////////////////////////
  // Menu Page Controller //
  ////////////////////////
  menuPage: function(page) {
    // Set functionality for 'No Category' and 'All' default categories respectively.
    myApp.services.categories.bindOnCheckboxChange(page.querySelector('#default-category-list ons-list-item[category-id=""]'));
    myApp.services.categories.bindOnCheckboxChange(page.querySelector('#default-category-list ons-list-item:not([category-id])'));

    // Change splitter animation depending on platform.
    document.querySelector('#mySplitter').left.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
  },

  ////////////////////////////
  // New Task Page Controller //
  ////////////////////////////
  newTaskPage: function(page) {
    // Set button functionality to save a new task.
    Array.prototype.forEach.call(page.querySelectorAll('[component="button/save-task"]'), function(element) {
      element.onclick = function() {
        var newTitle = page.querySelector('#title-input').value;

        if (newTitle) {
           let selection = page.querySelector("#choose-category").options[page.querySelector("#choose-category").selectedIndex].text
           if (selection!='Nouvelle catégorie'){
                page.querySelector('#category-input').value=selection;
           }

          // If input title is not empty, create a new task.
          myApp.services.tasks.create(
            {
              title: newTitle,
              category: page.querySelector('#category-input').value,
              description: page.querySelector('#description-input').value,
              deadline: page.querySelector('#deadline-input').value,
              highlight: page.querySelector('#highlight-input').checked,
              urgent: page.querySelector('#urgent-input').checked,
              etat:"A faire"
            }
          );

          // Set selected category to 'All', refresh and pop page.
          document.querySelector('#default-category-list ons-list-item ons-radio').checked = true;
          document.querySelector('#default-category-list ons-list-item').updateCategoryView();
          document.querySelector('#myNavigator').popPage();

        } else {
          // Show alert if the input title is empty.
          ons.notification.alert('You must provide a task title.');
        }
      };
    });
  },

  ////////////////////////////////
  // Details Task Page Controller //
  ///////////////////////////////
  detailsTaskPage: function(page) {
    // Get the element passed as argument to pushPage.
    var element = page.data.element;

    // Fill the view with the stored data.
    page.querySelector('#title-input').value = element.data.title;
    page.querySelector('#category-input').value = element.data.category;
    page.querySelector('#description-input').value = element.data.description;
    page.querySelector('#deadline-input').value = element.data.deadline;
    page.querySelector('#highlight-input').checked = element.data.highlight;
    page.querySelector('#urgent-input').checked = element.data.urgent;

    // Set button functionality to save an existing task.
    page.querySelector('[component="button/save-task"]').onclick = function() {
      var newTitle = page.querySelector('#title-input').value;

      if (newTitle) {
        // If input title is not empty, ask for confirmation before saving.
        ons.notification.confirm(
          {
            title: 'Save changes?',
            message: 'Previous data will be overwritten.',
            buttonLabels: ['Discard', 'Save']
          }
        ).then(function(buttonIndex) {
          if (buttonIndex === 1) {
            // If 'Save' button was pressed, overwrite the task.
            myApp.services.tasks.update(element,
              {
                title: newTitle,
                category: page.querySelector('#category-input').value,
                description: page.querySelector('#description-input').value,
                deadline: page.querySelector('#deadline-input').value,
                ugent: element.data.urgent,
                highlight: page.querySelector('#highlight-input').checked
              }
            );

            // Set selected category to 'All', refresh and pop page.
            document.querySelector('#default-category-list ons-list-item ons-radio').checked = true;
            document.querySelector('#default-category-list ons-list-item').updateCategoryView();
            document.querySelector('#myNavigator').popPage();
          }
        });

      } else {
        // Show alert if the input title is empty.
        ons.notification.alert('You must provide a task title.');
      }
    };
  }
};
