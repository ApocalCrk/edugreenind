function showTime(){
    var d = new Date().toLocaleString("en-ID", {timeZone: "Asia/Jakarta"});;
    document.getElementById('timer').innerHTML = d;
}
setInterval(showTime,1000);