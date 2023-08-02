async function update(linha){
    var id = document.getElementById('id'+linha+'').textContent;
    var n_unico = document.getElementById('n_Unico_snk'+linha+'').value;
    $.ajax({
        url : "finaliUpdate.php",
        type : "POST",
        data : {'id' : id, 'n_unico' : n_unico},
        success : ''
    })
    await window.location.replace('geral.php')
}