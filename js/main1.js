$("#izmeniForm").submit(function(){
    event.preventDefault();
    console.log("Pokrenuta je funkcija izmeni");
    $form=$(this);
    const $inputs=$form.find('input');
    const serializacija=$form.serialize();
    console.log(serializacija);
    request=$.ajax({
        url:"handler/change.php",
        type:"post",
        data:serializacija
    });
    request.done(function(response,textStatus,jqHXR){
        $poruka=response;
        if(($poruka=='Success')==0){
            console.log("operacija je ispravno izvršena");
        }
        else
            console.log("Greška se desila: "+response);
            console.log(response);
            console.log()
    });
});
