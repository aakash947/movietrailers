// $(window).load(function(){
//     $('.loader').fadeOut("fast");
//   // document.getElementById("loader").style.display = "none";
//   document.getElementById("outer").style.display = "block";
    
// });

setInterval(function(){
    $('.loader').fadeOut("fast");
  document.getElementById("outer").style.display = "block";
},6000);

 var r = document.getElementsByClassName('poster');
 for(var i=0;i<r.length;i++){
    r[i].onclick = function() {
        var id = this.id;
        document.location.href='./php/trailer.php?ide='+id;
    };
}

 var r = document.getElementsByClassName('poster1');
 for(var i=0;i<r.length;i++){
    r[i].onclick = function() {
        var id = this.id;
        document.location.href='../php/trailer.php?ide='+id;
    };
}
