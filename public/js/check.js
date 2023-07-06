const check = [];

for (let i = 1; i < 8; i++) {
    check[i] = document.getElementById('billCheck' + i);
}
console.log(check);
for (let i = 1; i < 8; i++) {
    check[i].onclick = function () {
        check[i].classList.toggle('fill-indigo-300');
        check[i].classList.toggle('fill-white');
        
    }
}