
function fillProgressBar(id){
    let bar = document.getElementById('progressBar'+id);
    let status = document.getElementById('status'+id);


    // status.innerHTML = bar.max+"%";
    // bar.value = bar.max;
    let i=0;
    // alert('while '+i+'<'+bar.max);
    // while (i < parseInt(bar.max)) {
    for (i;i<bar.max;i++) {
        setTimeout(function () {
            status.innerHTML = i + "%";
            bar.value = i;
            // alert('in timeout');

            // animateProgress(i, sim)
        }, 20000);
    }

console.log(id,i);

    // }
    // animateProgress(0,bar,status);

}

function animateProgress(i,sim) {

    if(i == bar.max || i===100){
        // status.innerHTML = bar.max;
        // bar.value = bar.max;
        clearTimeout(sim);
        return;
    }


    i++;

}


function progressBar(progress) {
    // alert(progress);
    var bar = document.getElementById('progressBar');
    var status = document.getElementById('status');
    status.innerHTML = progress+"%";
    bar.value = progress;
    progress++;
    var sim = setTimeout(progressBar(progress),30);




    // if(progress == 100){
    //     status.innerHTML = "100%";
    //     bar.value = 100;
    //     clearTimeout(sim);
        // var finalMessage = document.getElementById('finalMessage');
        // finalMessage.innerHTML = "Process is complete";
//     }
}

