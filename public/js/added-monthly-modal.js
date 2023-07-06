// const openAddedAlokasiBtn = [];
// const addedAlokasiModal = [];
// const closeAddedAlokasiBtn = [];
// for (let i = 1; i < 7; i++) {
//     openAddedAlokasiBtn[i] = document.getElementById('openAddedAlokasiBtn' + i);
    
//     addedAlokasiModal[i] = document.getElementById('addedAlokasiModal' + i)
//     closeAddedAlokasiBtn[i] = document.getElementById('closeAddedAlokasiBtn' + i);

// }

// for (let i = 1; i < 7; i++) {
//     openAddedAlokasiBtn[i].onclick = function () {
//       // modal.style.display = "block";
//       addedAlokasiModal[i].classList.toggle('hidden');
//     }
//     closeAddedAlokasiBtn[i].onclick = function() {
//       addedAlokasiModal[i].classList.toggle('hidden');
//       // modal.style.display = "none";
//     }
//   }
const openUangJajanBtn = document.getElementById('openUangJajanBtn');
const uangJajanModal = document.getElementById('uangJajanModal');
const closeUangJajanBtn = document.getElementById('closeUangJajanBtn');

openUangJajanBtn.onclick = function () {
  uangJajanModal.classList.toggle('hidden');
}
closeUangJajanBtn.onclick = function () {
  uangJajanModal.classList.toggle('hidden');
}