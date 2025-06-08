//admin tab

const addNews = document.querySelector('.add');
const addButton = document.querySelector('.add-btn');
const popup = document.querySelector('.add-popup');
const headline = document.getElementById('headline');
const description = document.getElementById('headline-description');
const admin_close = document.getElementById('closeBtn');

    admin_close.addEventListener('click', () => {
        popup.style.opacity = '0';
        popup.style.pointerEvents = 'none';
    });
    addNews.addEventListener('click', () => {
        popup.style.opacity = '1';
        popup.style.pointerEvents = 'all';
    });

   function wrapText(startTag, endTag) {
      const textarea = document.getElementById('headline-description');
      const start = textarea.selectionStart;
      const end = textarea.selectionEnd;
      const text = textarea.value;


      const selectedText = text.substring(start, end);


      const formattedText = startTag + selectedText + endTag;
      textarea.value = text.substring(0, start) + formattedText + text.substring(end);


      textarea.selectionStart = start;
      textarea.selectionEnd = start + formattedText.length;


      textarea.focus();
    }


    function insertText(textToInsert) {
      const textarea = document.getElementById('myTextarea');
      const start = textarea.selectionStart;
      const end = textarea.selectionEnd;
      const text = textarea.value;


      textarea.value = text.substring(0, start) + textToInsert + text.substring(end);


      textarea.selectionStart = textarea.selectionEnd = start + textToInsert.length;

      textarea.focus();
    }

