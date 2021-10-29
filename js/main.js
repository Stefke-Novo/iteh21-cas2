$("#dodajForm").submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");
    const $form =$(this);
    const $inputs =$form.find('input,select,button,textarea');
    const serijalizacija=$form.serialize();
    console.log(serijalizacija);
    request = $.ajax({
        url:'handler/add.php',
        type:'POST',
        data:serijalizacija
    });
    request.done(function(response,textStatus,jqXHR){
        if((response=='Success')==0){
            alert("Kolokvijum je zakazan");
            console.log("Uspešno zakazivanje");
            location.reload(true);
        }else
        console.log("Kolokvijum nije zakazan"+ response);
        console.log(response);
    });
    request.fail(function(jqXHR,textStatus,errorThrown){
        console.error('Sledeca greska se desila: '+textStatus,errorThrown);
    });
});