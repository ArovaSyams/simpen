const addBalanceModal = document.getElementById('addBalanceModal');
const closeBalanceBtn = document.getElementById('closeBalanceModal');
const addBalanceBtn = document.getElementById('addBalanceBtn');


addBalanceBtn.onclick = function () {
    addBalanceModal.classList.toggle('hidden');
  }
  closeBalanceBtn.onclick = function () {
    addBalanceModal.classList.toggle('hidden');
  }