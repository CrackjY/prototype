/**
 * Todo enable HTTPS
 */
// const { readFileSync } = require("fs");
// const { createServer } = require("https");
// const { Server } = require("socket.io");
//
// const httpServer = createServer({
//     key: readFileSync("/path/to/my/key.pem"),
//     cert: readFileSync("/path/to/my/cert.pem")
// });
const { createServer } = require("http");
const { Server } = require("socket.io");

const httpServer = createServer();
const io = new Server(httpServer, {
    cors: {
        origin: ["http://localhost:5173"],
    }
});

let sockets = [];

io.on("connection", (socket) => {
    socket.isConnected = false;
    
    socket.on('session', data => {

        if (!data.userConnected) {
            return;
        }

        sockets.push(socket);

        socket.isConnected = true;
            socket.user = data;
            io.sockets.emit('connected', sockets.map(s => s.user));
    });

    socket.on('disconnect', () => {
        sockets = sockets.filter( s => s !== socket);

        if (socket.isConnected) {
            io.sockets.emit('disconnectedU', sockets.map(s => s.user));
        }
    });
});

httpServer.listen(3000);
