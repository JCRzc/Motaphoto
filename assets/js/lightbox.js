/**
* @property {HTMLElement} element - The root element of the lightbox.
 * @property {string[]} images - Array containing paths of all images in the lightbox gallery.
 * @property {string} url - The currently displayed image URL.
 * @property {string[]} ref - Array containing overlay reference texts for each image.
 * @property {string[]} cat - Array containing overlay category texts for each image.
 */

class Lightbox {
  static init() {
    const thumbnails = Array.from(document.querySelectorAll('.post-photo-list, .post-photo-block'));
    const gallery = thumbnails.map(thumbnail => thumbnail.getAttribute('src'))
    const catref = Array.from(document.querySelectorAll(".overlay-photo-infos"));
    const ref = catref.map((r) => r.innerText.split("\n").slice(0, 1));
    const cat = catref.map((c) => c.innerText.split("\n").slice(1, 2));

    // Add event listener to each element with "overlay-screen-container" class
    const overlayScreenContainers = document.querySelectorAll('.overlay-screen-container');
    overlayScreenContainers.forEach((overlayScreenContainer, index) => {
      overlayScreenContainer.addEventListener('click', (e) => {
        e.preventDefault();
        const clickedThumbnail = thumbnails[index];
        const clickedImageUrl = clickedThumbnail ? clickedThumbnail.getAttribute('src') : '';
        const clickedOverlayReference = ref[index][0];
        const clickedOverlayCategory = cat[index][0];

        const lightboxInstance = new Lightbox(clickedImageUrl, gallery, clickedOverlayReference, clickedOverlayCategory, ref, cat);

        // Call loadImage after instance creation
        lightboxInstance.loadImage(clickedImageUrl, clickedOverlayReference, clickedOverlayCategory);
      });
    });
  }

  constructor(url, images, overlayReferenceText, overlayCategoryText, ref, cat) {
    this.element = this.buildDOM(url, overlayReferenceText, overlayCategoryText);
    this.images = images;
    this.ref = ref;
    this.cat = cat;
    this.loadImage(url);
    this.onKeyUp = this.onKeyUp.bind(this);
    document.body.appendChild(this.element);
    document.addEventListener('keyup', this.onKeyUp);
  }

  loadImage(url, loadRef, loadCat) {
    this.url = null;
    const image = new Image();
    const container = this.element.querySelector('.lightbox__container');
    const overlayReferenceTextContainer = this.element.querySelector('.lightbox-photo-ref');
    const overlayCategoryTextContainer = this.element.querySelector('.lightbox-photo-cat');
    const loader = document.createElement('div');
    loader.classList.add('lightbox__loader');
    container.innerHTML = '';
    overlayReferenceTextContainer.innerHTML = '';
    overlayCategoryTextContainer.innerHTML = '';
    container.appendChild(loader);

    image.onload = () => {
      container.removeChild(loader);
      container.appendChild(image);
      this.url = url;
    };
    image.src = url;

    overlayReferenceTextContainer.innerText = loadRef;
    overlayCategoryTextContainer.innerText = loadCat;
  }


  /**
   * Close the lightbox using the keyboard
   * @param {KeyboardEvent } e - The keyboard event.
   */
  onKeyUp(e) {
    if (e.key == 'Escape') {
      this.close(e)
    } else if (e.key == 'ArrowLeft') {
      this.prev(e)
    } else if (e.key == 'ArrowRight') {
      this.next(e)
    }
  }

  /**
   * Close the lightbox
   * @param {MouseEvent/KeyboardEvent} e - The mouse or keyboard event.
   */
  close(e) {
    e.preventDefault()
    this.element.classList.add('fadeOut')
    window.setTimeout(() => {
      this.element.parentElement.removeChild(this.element)
    }, 500)
    document.removeEventListener('keyup', this.onKeyUp)
  }

  /** Move to the next image in the lightbox gallery
   * @param {MouseEvent/KeyboardEvent} e - The mouse or keyboard event.
   */
  next(e) {
    e.preventDefault();
    let i = this.images.findIndex(image => image == this.url);
    if (i < this.images.length - 1) {
      this.loadImage(this.images[i + 1], this.ref[i + 1], this.cat[i + 1]);
    }
  }

  /** Move to the previous image in the lightbox gallery
   * @param {MouseEvent/KeyboardEvent} e - The mouse or keyboard event.
   */
  prev(e) {
    e.preventDefault();
    let i = this.images.findIndex(image => image == this.url);
    if (i > 0) {
      this.loadImage(this.images[i - 1], this.ref[i - 1], this.cat[i - 1]);
    }
  }

  /**
   * Build the DOM structure for the lightbox
   * @return {HTMLElement} - The root element of the lightbox.
   */
  buildDOM() {
    const dom = document.createElement('div')
    dom.classList.add('lightbox')
    dom.innerHTML = `<button class="lightbox__close">X</button>
      <button class="lightbox__next">Suivante</button>
      <span class="next-text">Suivante</span>
      <span class="prev-text">Précédente</span>
      <button class="lightbox__prev">Précédente</button>
      <div class="lightbox__container">
      </div>
      <div class="lightbox-photo-infos">
      <div class="lightbox-photo-ref"></div>
          <div class="lightbox-photo-cat"></div>
          </div>`
    dom.querySelector('.lightbox__close').addEventListener('click', this.close.bind(this))
    dom.querySelector('.lightbox__next').addEventListener('click', this.next.bind(this))
    dom.querySelector('.lightbox__prev').addEventListener('click', this.prev.bind(this))

    return dom
  }
}

Lightbox.init();