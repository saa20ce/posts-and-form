const Encore = require('@symfony/webpack-encore');
const Encore = require('@symfony/webpack-encore');

Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');

Encore
  .setOutputPath('public/build/') // Указывает путь, где будут храниться сгенерированные файлы
  .setPublicPath('/build') // Устанавливает публичный путь для сгенерированных файлов
  .enableVueLoader() // Включает загрузчик Vue для компиляции Vue-компонентов
  .addEntry('app', './assets/vue/app.js') // Добавляет точку входа для вашего приложения на Vue.js
  .enableSassLoader() // Включает загрузчик SASS, если вы используете SASS в вашем проекте
  .enablePostCssLoader() // Включает загрузчик PostCSS, если вы используете PostCSS в вашем проекте
  .enableSourceMaps(!Encore.isProduction()) // Включает карты исходников для разработки
  .cleanupOutputBeforeBuild(); // Очищает папку build перед каждой сборкой

  module.exports = Encore.getWebpackConfig();
