import hljs from 'highlight.js';

// toggle menu
export const toggleMenu = () => {
    document.getElementById('menu-btn').onclick = function () {
        let menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden')
            menu.classList.add('md:hidden')
        } else {
            menu.classList.remove('md:hidden')
            menu.classList.add('hidden');
        }
    }
}

// opacity transition
export const personallyOpacityTransition = (id, duration, fromClass, toClass) => {
    
    const title = document.getElementById(id);
    setTimeout(() => {
        title.classList.remove(fromClass);
        title.classList.add('transition-opacity', `duration-${duration+300}`, 'ease-in', toClass)
    }, duration);
}

// syntax hightlighter
export const personallySyntaxHighlighter = () => {
    document.querySelectorAll('pre code').forEach((el) => {
        hljs.highlightElement(el);
    });
}


import.meta.webpackHot?.accept(toggleMenu, personallyOpacityTransition, personallySyntaxHighlighter);