var situacao = document.querySelector('#situacao')


const handleSubmit = (event) =>{
    event.preventDefault();
    const date = new Date().toLocaleString();
    const fornecedor = document.querySelector('#Fornecedor').value;
    var empresa = document.querySelector('#empresa').value;
    var grupoEmpresa = document.querySelector('#GrupoEmpresa').value;
    const dataFat = document.querySelector('#mydate1').value;
    const dataEnt = document.querySelector('#mydate2').value;
    var regional = $("#pedido input[type='radio']:checked").val();
    
    
    empresa = empresa == 1 ? 'Exclusiva' : (empresa == 2 ? 'Sg' : (empresa == 3 ? 'Util' : (empresa == 4 ? 'Prime' : (empresa == 7 ? 'Asg' : 'Empresa Não selecionada')))) ;
    grupoEmpresa = grupoEmpresa == 1 ? 'Exclusiva' : 'Prime';
    const url = 'https://api.sheetmonkey.io/form/sxqv9ux7Fx3c3cwBjzhEov'
    var request = new Request(url,{
        method : 'post',
        headers : {
            'Accept' : 'application/json',
            'Content-type' : 'application/json'
        },
        body : JSON.stringify({
            "Carimbo de data/hora" : date,
            "Fornecedor" : fornecedor,
            "Empresa" : empresa,
            "Grupo Empresa"	 : grupoEmpresa ,
            "Data faturamento" : 	dataFat,
            "Data entrega"	:dataEnt,
            "Regional" : regional
        })
    });
    fetch(request).then(function(response){
     
        if (response.status == 200)
        {
            setTimeout(alerta(1,response.code), 10000);
            
            document.querySelector('#Fornecedor').value = '';
            document.querySelector('#empresa').value = 0;
            document.querySelector('#GrupoEmpresa').value = 0;
            document.querySelector('#mydate1').value = '';
            document.querySelector('#mydate2').value = '';
            setTimeout(() => {
                document.querySelector('#status').remove()
            }, 2000)
        }

    })
    
        
    
    
    

    console.log(fornecedor , empresa, grupoEmpresa, dataFat, dataEnt, regional);


}

function alerta(i,code){
    if (i ==1){
        situacao.classList.add('active');
        situacao.innerHTML = '<div class="bg-exclusiva-success" id="status"><h1 class="h1">Pedido Cadastrado com Sucesso</h1> </div>';
    }
    else if(i ==2){
        situacao.classList.remove('active')
        situacao.innerHTML = '<h1 class="h1">Ouve Algum erro no cadastro | ERROR CODE :   ' +code+ '</h1>';
    }
}

document.querySelector('#pedido').addEventListener('submit', handleSubmit)