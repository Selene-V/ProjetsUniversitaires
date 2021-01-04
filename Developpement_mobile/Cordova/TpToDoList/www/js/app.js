// App logic.
window.myApp = {};
  document.addEventListener('init', function(event) {
  var page = event.target;

  // Each page calls its own initialization controller.
  if (myApp.controllers.hasOwnProperty(page.id)) {
    myApp.controllers[page.id](page);
  }

  // Fill the lists with initial data when the pages we need are ready.
  // This only happens once at the beginning of the app.
  /*if (page.id === 'menuPage' || page.id === 'pendingTasksPage') {
    if (
    document.querySelector('#menuPage')
      && document.querySelector('#pendingTasksPage')
      && !document.querySelector('#pendingTasksPage ons-list-item')
      ){
        setTimeout(myApp.services.methodes.initialisation(), 1000);*/
        /*
        myApp.services.fixtures.forEach(function(data) {
        myApp.services.tasks.create(data);
        });
        */
/*
    }
  }*/

      if (page.id === 'menuPage' || page.id === 'pendingTasksPage'){
          if (
            document.querySelector('#menuPage')
            && document.querySelector('#pendingTasksPage')
            && !document.querySelector('#pendingTasksPage ons-list-item')
            ) {
               setTimeout(myApp.services.methodes.initPending(), 1000);
          }
      }
      if (page.id === 'menuPage' || page.id === 'encoursTasksPage'){
          if (
            document.querySelector('#menuPage')
            && document.querySelector('#encoursTasksPage')
            && !document.querySelector('#encoursTasksPage ons-list-item')
            ){
                 setTimeout(myApp.services.methodes.initEncours(), 1000);
          }
      }
      if (page.id === 'menuPage' || page.id === 'completedTasksPage'){
          if (
            document.querySelector('#menuPage')
            && document.querySelector('#completedTasksPage')
            && !document.querySelector('#completedTasksPage ons-list-item')
            ){
                 setTimeout(myApp.services.methodes.initComplete(), 1000);
          }
      }
});

