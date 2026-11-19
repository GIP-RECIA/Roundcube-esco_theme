(function () {
  var VARS = ['--recia-primary', '--recia-primary-dark', '--recia-primary-light'];

  function syncInto(target) {
    var style = getComputedStyle(document.body);
    VARS.forEach(function (name) {
      var val = style.getPropertyValue(name);
      if (val) {
        target.style.setProperty(name, val);
      }
    });
  }

  function syncFrame(frame) {
    try {
      if (frame.contentDocument) {
        syncInto(frame.contentDocument.documentElement);
      }
    } catch (e) {}
  }

  function syncAllFrames() {
    document.querySelectorAll('iframe').forEach(syncFrame);
  }

  function watchFrame(frame) {
    frame.addEventListener('load', function () {
      syncFrame(frame);
    });
  }

  syncAllFrames();
  document.querySelectorAll('iframe').forEach(watchFrame);

  new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      mutation.addedNodes.forEach(function (node) {
        if (node.nodeType !== 1) {
          return;
        }
        if (node.tagName === 'IFRAME') {
          watchFrame(node);
        } else if (node.querySelectorAll) {
          node.querySelectorAll('iframe').forEach(watchFrame);
        }
      });
    });
    syncAllFrames();
  }).observe(document.body, { attributes: true, attributeFilter: ['class'], childList: true, subtree: true });
})();
