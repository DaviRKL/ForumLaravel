module.exports = {
  presets: ['@babel/preset-env'],
  plugins: [
    [
      'module-resolver',
      {
        root: ['./resources/js'],
        alias: {
          components: './resources/js/components'
          // Adicione mais aliases conforme necessário para outros diretórios
        }
      }
    ]
  ]
};