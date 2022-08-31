let address = document.getElementById('address');
let addressInput =document.getElementById('addressInput');

if(addressInput.value == ""){
    address.style.display = 'none';
    console.log('aa');
}else{
    address.style.display = 'block';
}