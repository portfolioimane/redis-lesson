var server = require('http').Server();
var io = require('socket.io')(server, {
  cors: {
    origin: '*',
  }
});
var Redis = require('ioredis');
var port = process.env.PORT || 3000;

var redis = new Redis();

redis.subscribe('laravel_database_test-channel');

redis.on('message', function(channel, message) {
   console.log(channel, message);
    console.log('Message Received');
    message=JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

server.listen(port, function(){
    console.log('listening on *:' + port);
});
