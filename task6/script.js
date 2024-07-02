document.addEventListener('DOMContentLoaded', function(){
   let canvas = document.getElementById('canvas');
   let context = canvas.getContext('2d');
   let socket = new WebSocket('ws://localhost:8081');

   canvas.width = window.innerWidth - 20;
   canvas.height = window.innerHeight - 20;
   context.lineWidth = 2;
   context.strokeStyle = 'black'; // Use 'strokeStyle' instead of 'colorStyle'

   let data = {
      action: 'list'
   };
   if (socket.readyState === WebSocket.OPEN) {
      console.log(1234);
      socket.send(JSON.stringify(data));
   } else {
      console.error('WebSocket is not open');
   }

   


   canvas.addEventListener('mousedown', startDrawing);
   canvas.addEventListener('mousemove', draw);
   canvas.addEventListener('mouseup', stopDrawing);
   canvas.addEventListener('mouseout', stopDrawing);

   socket.addEventListener('open', function (event) {
      console.log('WebSocket connected');
      //alert(1);
      if (socket.readyState === WebSocket.OPEN) {
         socket.send(JSON.stringify(data));
      } else {
         console.error('WebSocket is not open');
      }
   });
   socket.onmessage = function(event){

      let data = JSON.parse(event.data);
      console.log(data);
      for(let i = 1; i < data.length; i++){
         //context.beginPath();

         context.moveTo(data[i-1][0], data[i-1][1]);
         context.lineTo(data[i][0], data[i][1]);
         context.stroke();
      }
   };
   socket.addEventListener('error', function (error) {
      console.error('WebSocket error:', error);
   });

   function startDrawing(event){
      context.beginPath();
      context.moveTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
      canvas.addEventListener('mousemove', draw);
   }
   function draw(event){
      context.lineTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
      context.stroke();
      let data = {
         boardId: 1, // Corrected 'boardId' spelling
         action: 'draw',
         x: event.clientX - canvas.offsetLeft,
         y: event.clientY - canvas.offsetTop,
         color: context.strokeStyle
      };
   
      if (socket.readyState === WebSocket.OPEN) {
         socket.send(JSON.stringify(data));
      } else {
         console.error('WebSocket is not open');
      }
   }
   function stopDrawing(event){
      canvas.removeEventListener('mousemove', draw);
   }
  
   window.addEventListener('resize', function(){
      canvas.width = window.innerWidth - 20;
      canvas.height = this.window.innerHeight - 20;
   });

});