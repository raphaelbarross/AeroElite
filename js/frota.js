
document.querySelectorAll('.saiba-mais').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const card = e.target.closest('.aeronave-card');
    const info = card.querySelector('.info-extra');
    if (!info) return;
    const isHidden = info.hasAttribute('hidden');
    if (isHidden) info.removeAttribute('hidden');
    else info.setAttribute('hidden','');
    if (!isHidden) return;
    setTimeout(()=> {
      info.scrollIntoView({behavior:'smooth', block:'center'});
    }, 160);
  });
});


document.querySelectorAll('.solicitar').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const modelo = btn.dataset.modelo || 'este jato';
    const url = `/paginas/reserva.html?modelo=${encodeURIComponent(modelo)}`;
    window.location.href = url;
  });
});
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });
});