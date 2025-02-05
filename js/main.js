const countersEl = document.querySelectorAll(".number");
// Селектирај го hamburger копчето и навигацијата
const navbarToggler = document.getElementById('navbar-toggler');
const navbarLinks = document.querySelector('.navbar-links');

// Додади настан за кликање на hamburger копчето
navbarToggler.addEventListener('click', () => {
  // Промени ја класата на hamburger копчето
  navbarToggler.classList.toggle('active');
  // Промени ја класата на навигацијата за да се прикаже
  navbarLinks.classList.toggle('active');
});

countersEl.forEach((counterEl) => {
  counterEl.innerText = "0";
  incrementCounter(counterEl);
  function incrementCounter(counterEl) {
    let currentNum = +counterEl.innerText;
    const dataCeil = counterEl.getAttribute("data-ceil");
    const increment = dataCeil / 15;
    currentNum = Math.ceil(currentNum + increment);

    if (currentNum < dataCeil) {
      counterEl.innerText = currentNum;
      setTimeout(() => incrementCounter(counterEl), 50);
    } else {
      counterEl.innerText = dataCeil;
    }
  }
});

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      countersEl.forEach((counterEl) => {
        incrementCounter(counterEl); // Повикај ја функцијата за секој бројач
      });
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.33 });

const counterSection = document.getElementById('section-counter');
observer.observe(counterSection);



document.addEventListener('DOMContentLoaded', function () {
  const orderButtons = document.querySelectorAll('.btnOrder');
  const orderTableBody = document.querySelector('#orderTable tbody');

  const orders = []; // Листа за складирање на нарачките

  orderButtons.forEach(button => {
      button.addEventListener('click', function (event) {
          event.preventDefault();

          const menuItem = this.closest('.menus');
          const productName = menuItem.querySelector('h3').innerText;
          const productPrice = menuItem.querySelector('.price').innerText;

          const confirmOrder = confirm(`Дали сакате да ја нарачате: ${productName} за ${productPrice}?`);

          if (confirmOrder) {
              // Додавање на ставката во листата
              orders.push({ name: productName, price: productPrice });

              // Прикажување во табелата
              const newRow = document.createElement('tr');
              newRow.innerHTML = `
                  <td>${productName}</td>
                  <td>${productPrice}</td>
              `;
              orderTableBody.appendChild(newRow);

              alert('Вашата ставка е успешно додадена!');
          } else {
              alert('Ставката не е додадена.');
          }
      });
  });
});


