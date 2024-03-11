import domReady from '@roots/sage/client/dom-ready';
import {personallyOpacityTransition, personallySyntaxHighlighter, toggleMenu } from './common';

/**
 * Application entrypoint
 */
domReady(async () => {
  document.body.style.visibility = 'visible';
  // toggle menu
  toggleMenu();
  // app transition
  personallyOpacityTransition('app', 1000, 'opacity-0', 'opacity-100');
  // hero title transition
  personallyOpacityTransition('hero-title', 1200, 'opacity-0', 'opacity-100');
  // syntax highlighter
  personallySyntaxHighlighter()
});



/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
