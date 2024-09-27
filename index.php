<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .search-container {
            margin: 20px 0;
            text-align: center;
        }
        input[type="text"] {
            width: 60%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        #searchResult {
            margin-top: 20px;
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>


    <div class="header">
        <h1>Welcome to Our Product Store </h1>
    </div>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search for a product..." oninput="searchProduct()">
        <button onclick="searchProduct()">Search</button>
        <div id="searchResult"></div>
    </div>

    <div class="products" id="productList">
        <div class="product">Product 1: Phone</div>
        <div class="product">Product 2: Laptop</div>
        <div class="product">Product 3: Camera</div>
        <div class="product">Product 4: Tablet</div>
        <div class="product">Product 5: Headphones</div>
        <div class="product">Product 6: Smartwatch</div>
        <div class="product">Product 7: Monitor</div>
        <div class="product">Product 8: Keyboard</div>
        <div class="product">Product 9: Mouse</div>
        <div class="product">Product 10: Printer</div>
    </div>


    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a short card.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://www.dpreview.com/files/p/articles/6269402639/canon_eosr8.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/keyboard/desktop-keyboard/w/l/6/gaming-keyboard-with-87-keys-rgb-backlit-with-suspension-keys-original-imagzcgwtrabgjna.jpeg?q=20&crop=false" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="col">
    <div class="card h-100">
      <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/keyboard/desktop-keyboard/w/l/6/gaming-keyboard-with-87-keys-rgb-backlit-with-suspension-keys-original-imagzcgwtrabgjna.jpeg?q=20&crop=false" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="col">
    <div class="card h-100">
      <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/keyboard/desktop-keyboard/w/l/6/gaming-keyboard-with-87-keys-rgb-backlit-with-suspension-keys-original-imagzcgwtrabgjna.jpeg?q=20&crop=false" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="col">
    <div class="card h-100">
      <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/keyboard/desktop-keyboard/w/l/6/gaming-keyboard-with-87-keys-rgb-backlit-with-suspension-keys-original-imagzcgwtrabgjna.jpeg?q=20&crop=false" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>

    <script>
        function testUserInputForTags(input) {
    const tags = [
        'a', 'a2', 'abbr', 'acronym', 'address', 'animate', 'animatemotion', 'animatetransform', 'applet',
        'area', 'article', 'aside', 'audio', 'audio2', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote',
        'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'command',
        'content', 'data', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt',
        'element', 'em', 'embed', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'frame',
        'frameset', 'h1', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'iframe2', 'image',
        'image2', 'image3', 'img', 'img2', 'input', 'input2', 'input3', 'input4', 'ins', 'kbd', 'keygen',
        'label', 'legend', 'li', 'link', 'listing', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem',
        'meta', 'meter', 'multicol', 'nav', 'nextid', 'nobr', 'noembed', 'noframes', 'noscript', 'object',
        'ol', 'optgroup', 'option', 'output', 'param', 'picture', 'plaintext', 'pre', 'progress', 'q',
        'rb', 'rp', 'rt', 'rtc', 'ruby', 's', 'samp', 'script', 'section', 'select', 'set', 'shadow', 'slot',
        'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'svg',
        'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'track',
        'tt', 'u', 'ul', 'var', 'video', 'video2', 'wbr', 'xmp', 'custom tags'
    ];
      const lowerInput = input.toLowerCase();
      for (let tag of tags) {
          const tagPattern = new RegExp(`<${tag}\\b[^>]*>`, 'i');
          if (tagPattern.test(lowerInput)) {
              return 0;
          }
      }
      
      return 1;
  }
  function testUserInputForEvents(input) {
    const events = [
        'onafterprint', 'onafterscriptexecute', 'onanimationcancel', 'onanimationend', 'onanimationiteration',
        'onanimationstart', 'onauxclick', 'onbeforecopy', 'onbeforecut', 'onbeforeinput', 'onbeforeprint',
        'onbeforescriptexecute', 'onbeforetoggle', 'onbeforeunload', 'onbegin', 'onblur', 'oncanplay',
        'oncanplaythrough', 'onchange', 'onclick', 'onclose', 'oncontextmenu', 'oncuechange', 
        'oncut', 'ondblclick', 'ondrag', 'ondragend', 'ondragenter', 'ondragexit', 'ondragleave', 'ondragover', 
        'ondragstart', 'ondrop', 'ondurationchange', 'onend', 'onended', 'onerror', 'onfocus', 'onfocusin', 
        'onfocusout', 'onformdata', 'onfullscreenchange', 'onhashchange', 'oninput', 'oninvalid', 'onkeydown', 
        'onkeypress', 'onkeyup', 'onload', 'onloadeddata', 'onloadedmetadata', 'onloadstart', 'onmessage', 
        'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 
        'onmousewheel', 'onmozfullscreenchange', 'onpagehide', 'onpageshow', 'onpaste', 'onpause', 'onplay', 
        'onplaying', 'onpointercancel', 'onpointerdown', 'onpointerenter', 'onpointerleave', 'onpointermove', 
        'onpointerout', 'onpointerover', 'onpointerrawupdate', 'onpointerup', 'onpopstate', 'onprogress', 
        'onratechange', 'onrepeat', 'onreset', 'onresize', 'onscroll', 'onscrollend', 'onsearch', 'onseeked', 
        'onseeking', 'onselect', 'onselectionchange', 'onselectstart', 'onshow', 'onsubmit', 'onsuspend', 
        'ontimeupdate', 'ontoggle', 'ontouchend', 'ontouchmove', 'ontouchstart', 'ontransitioncancel', 
        'ontransitionend', 'ontransitionrun', 'ontransitionstart', 'onunhandledrejection', 'onunload', 
        'onvolumechange', 'onwebkitanimationend', 'onwebkitanimationiteration', 'onwebkitanimationstart', 
        'onwebkitmouseforcechanged', 'onwebkitmouseforcedown', 'onwebkitmouseforceup', 'onwebkitmouseforcewillbegin', 
        'onwebkitplaybacktargetavailabilitychanged', 'onwebkittransitionend', 'onwebkitwillrevealbottom', 'onwheel'
    ];
    const lowerInput = input.toLowerCase();
    for (let event of events) {
        const eventPattern = new RegExp(`\\b${event}\\b`, 'i'); 
        if (eventPattern.test(lowerInput)) {
            return 0;
        }
    }
    
    return 1;
}

        function searchProduct() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const products = document.querySelectorAll('.product');
            let found = false;

           
            products.forEach(product => {
                if (product.innerText.toLowerCase().includes(input)) {
                    product.style.display = 'block';
                    found = true;
                } else {
                    product.style.display = 'none';
                }
            });

           
            const searchResult = document.getElementById('searchResult');
            if (!found && input !== '' ) {
              if(testUserInputForTags(input)==1&&testUserInputForEvents(input)==1)
                searchResult.innerHTML = `No products found for "${input}"`;
              else {
                searchResult.innerHTML = `No products found for`;
              }
            } else {
                searchResult.innerHTML = '';
            }
        }
    </script>

</body>
</html>
