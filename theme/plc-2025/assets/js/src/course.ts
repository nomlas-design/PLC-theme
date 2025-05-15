document.addEventListener('DOMContentLoaded', function () {
  function showCopiedPopup(message: string) {
    // Create and configure the popup div
    const popup =
      document.querySelector('.share-popup') || document.createElement('div');
    popup.textContent = message;
  }

  const shareBtn = document.querySelector('.share-btn');
  const sharePopup = document.querySelector('.share-popup');

  shareBtn?.addEventListener('click', () => {
    sharePopup?.classList.add('share-popup--animate');
    const text = `${document.title}\n${window.location.href}`;
    navigator.clipboard.writeText(text).then(() => {
      showCopiedPopup('Link copied!');
    });

    setTimeout(() => {
      sharePopup?.classList.remove('share-popup--animate');
    }, 1500);
  });
});
