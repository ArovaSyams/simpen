const overlay = document.getElementById('overlay')

const modalBtn = [];
const modal = [];
const closeModal = []

for (let i = 1; i < 8; i++) {
  modalBtn[i] = document.getElementById('modalBtn' + i);
  
  closeModal[i] = document.getElementById('closeModal' + i)
  modal[i] = document.getElementById('modal' + i);
}

for (let i = 1; i < 8; i++) {
  modalBtn[i].onclick = function () {
    // modal.style.display = "block";
    modal[i].classList.toggle('hidden');
  }
  closeModal[i].onclick = function() {
    modal[i].classList.toggle('hidden');
    // modal.style.display = "none";
  }
}


// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == overlay) {
//       modal.classList.toggle('hidden');
//       // modal.style.display = "none";
//     }
//   }