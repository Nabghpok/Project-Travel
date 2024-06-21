/*Array.from(document.getElementsByTagName('input')).forEach(e, i)=>{
    e.addEventListner('keyup', (e1)=>{
        if (e.value.length>0) {
            document.getElementsByClassName('bi-caret-down-fill')[i].computedStyleMap.transform="rotate(180deg)";
            
        } else {
            document.getElementsByClassName('bi-caret-down-fill')[i].computedStyleMap.transform="rotate(0deg)";
        }
    })
})