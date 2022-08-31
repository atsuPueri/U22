let address = document.getElementById('address');
let user = document.getElementById('user');
let manager = document.getElementById('manager');
console.log(address);
address.style.display = 'none';
manager.addEventListener('click' , ()=>{
    address.style.display = 'block';
});

user.addEventListener('click' , ()=>{
    address.style.display = 'none';
});
