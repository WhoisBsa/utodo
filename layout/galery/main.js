const img_controls = document.getElementById('image-controls');
const gallery = document.getElementById('gallery');

const n_photos = 9;

for (let i = 1; i <= n_photos; i++) {
  var img_element = document.createElement('img');

  img_element.id = `img-${i}`;
  img_element.src = `images/img${i}.jpg`;  

  gallery.appendChild(img_element);
}

for (let i = 1; i <= n_photos; i++) {
  var img_element = document.createElement('img');

  img_element.id = `imagem${i}`;
  img_element.src = `images/img${i}.jpg`;  

  img_controls.appendChild(img_element);
}