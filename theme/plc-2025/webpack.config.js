const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const isDevelopment = process.env.NODE_ENV === 'development';
const plugins = [
  new MiniCssExtractPlugin({
    filename: 'css/[name].css',
  }),
];
// Only add BrowserSync in development mode
if (isDevelopment) {
  plugins.push(
    new BrowserSyncPlugin(
      {
        host: 'localhost',
        port: 3000,
        proxy: 'http://localhost:8000',
        files: ['./dist/css/*.css', './dist/js/*.js', './**/*.php'],
        injectChanges: true,
        notify: false,
        reloadDelay: 0,
        codeSync: true,
        reloadOnRestart: true,
        snippetOptions: {
          ignorePaths: ['wp-admin/**'],
        },
      },
      {
        reload: true,
      }
    )
  );
}
module.exports = {
  entry: {
    main: ['./assets/js/src/main.ts', './assets/scss/main.scss'],
    courses: './assets/js/src/courses.ts',
    course: './assets/js/src/course.ts',
    slider: './assets/js/src/slider.ts',
    booking: './assets/js/src/booking.ts',
  },
  output: {
    filename: 'js/[name].js',
    path: path.resolve(__dirname, 'dist'),
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
      },
    ],
  },
  plugins,
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
  },
  watch: isDevelopment,
  watchOptions: {
    ignored: /node_modules/,
    aggregateTimeout: 300,
    poll: 1000,
  },
  devtool: isDevelopment ? 'source-map' : false,
  mode: isDevelopment ? 'development' : 'production',
};
