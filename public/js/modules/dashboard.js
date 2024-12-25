let _id = localStorage.getItem('id')
let profileEditLink = document.getElementById('profile_edit');
if (profileEditLink) {
  let currentHref = profileEditLink.getAttribute('href');
  profileEditLink.setAttribute('href', currentHref + `?_id=${_id}`);
  const newHref = profileEditLink.getAttribute('href');
  console.log("Novo Href:", newHref);
} else {
  console.error('Elemento com ID "profile_edit" não encontrado.');
}