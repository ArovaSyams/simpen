const editALokasiModal = document.getElementById('editALokasiModal');
const closeEditALokasiBtn = document.getElementById('closeEditALokasiModal');
const editALokasiBtn = document.getElementById('editALokasiBtn');

editAlokasiBtn.onclick = function () {
  editAlokasiModal.classList.toggle('hidden');
}
closeEditAlokasiBtn.onclick = function () {
  editAlokasiModal.classList.toggle('hidden');
}