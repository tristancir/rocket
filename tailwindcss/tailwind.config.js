module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens:{
        'mxs':{ 'min':'319px', 'max':'425px'},
        'xs':{ 'max':'639'},
      },
      spacing: {
        'main-image-lg':'40rem',
        '128': '32rem'
      },
      backgroundImage: theme=>({
        'main-section':"url('../images/main.jpg')",
        'box-parents':"url('../images/boxes/img_parents.jpg')",
        'box-coaches':"url('../images/boxes/imag_coaches.jpg')",
        'box-referees':"url('../images/boxes/img_referees.jpg')",
        'modal-alert-2xl': "url('../images/img_alert_2xl.jpg')",
        'modal-alert': "url('../images/img_alert.jpg')",
      }),
      colors:{
        "blue-header":"#004096",
        "blue-alert":"#16496f",
        "blue-footer":"#123360",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
