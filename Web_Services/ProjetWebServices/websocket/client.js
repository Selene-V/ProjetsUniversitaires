var socket = null;
try {
    socket = new WebSocket('ws://127.0.0.1:8889');
    socket.onopen = function () {
        console.log('connection is opened. Waiting for messages!');
        return;
    };
    socket.onmessage = function (msg) {
        console.log('Message received: ', msg.data);

        return;
    };
    socket.onclose = function () {
        console.log('connection is closed!');

        return;
    };
} catch (e) {
    console.log(e);
}




fetch('http://rest/api/product')
