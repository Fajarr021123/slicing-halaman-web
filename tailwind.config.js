import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };

// remember to use module.exports instead of tailwind.config in production
tailwind.config = 
   {
      // Note: config only includes the used styles & variables of your selection
      content: ["./src/**/*.{html,vue,svelte,js,ts,jsx,tsx}"],
      theme: {
        extend: {
          fontFamily: {
            'semi-bold-heading-h1-font-family': "Campton-SemiBold, sans-serif",
'regular-h2-font-family': "Campton-Book, sans-serif",
'medium-h3-font-family': "Campton-Medium, sans-serif",
'medium-h2-font-family': "Campton-Medium, sans-serif",
'medium-h4-font-family': "Campton-Medium, sans-serif",
'semi-bold-heading-h2-font-family': "Campton-SemiBold, sans-serif",
          },
          fontSize: {
            'semi-bold-heading-h1-font-size': "24px",
'regular-h2-font-size': "20px",
'medium-h3-font-size': "16px",
'medium-h2-font-size': "20px",
'medium-h4-font-size': "12px",
'semi-bold-heading-h2-font-size': "20px",
          },
          fontWeight: {
            'semi-bold-heading-h1-font-weight': "600",
'regular-h2-font-weight': "400",
'medium-h3-font-weight': "500",
'medium-h2-font-weight': "500",
'medium-h4-font-weight': "500",
'semi-bold-heading-h2-font-weight': "600",
          },
          lineHeight: {
            'semi-bold-heading-h1-line-height': "28px",
'regular-h2-line-height': "23px",
'medium-h3-line-height': "19px",
'medium-h2-line-height': "23px",
'medium-h4-line-height': "14px",
'semi-bold-heading-h2-line-height': "23px", 
          },
          letterSpacing: {
             
          },
          borderRadius: {
              
          },
          colors: {
            'default-color-black': '#000000',
'primary-color-primary-dark': '#e00019',
'default-color-white': '#ffffff',
'secondary-color-secondary-light': '#eeeeee',
'secondary-color-secondary-dark': '#5f5f5f',
'gray-color-gray-800': '#212529',
'primary-color-primary': '#f60621',
'action-color-warning': '#ffc107',
'action-color-success': '#28a745',
'secondary-color-secondry': '#999999',
'action-color-information': '#023668',
'grayscale-white': '#ffffff',
            
          },
          spacing: {
              
          },
          width: {
             
          },
          minWidth: {
             
          },
          maxWidth: {
             
          },
          height: {
             
          },
          minHeight: {
             
          },
          maxHeight: {
             
          }
        }
      }
    }

// remember to use module.exports instead of tailwind.config in production
tailwind.config = {
    // Note: config only includes the used styles & variables of your selection
    content: ["./src/**/*.{html,vue,svelte,js,ts,jsx,tsx}"],
    theme: {
      extend: {
        fontFamily: {
          "medium-h3-font-family": "Campton-Medium, sans-serif",
          "regular-h3-font-family": "Campton-Book, sans-serif",
          "semi-bold-heading-h1-font-family": "Campton-SemiBold, sans-serif",
          "regular-h2-font-family": "Campton-Book, sans-serif",
          "regular-h4-font-family": "Campton-Book, sans-serif",
          "medium-h4-font-family": "Campton-Medium, sans-serif",
          "medium-h2-font-family": "Campton-Medium, sans-serif",
        },
        fontSize: {
          "medium-h3-font-size": "16px",
          "regular-h3-font-size": "16px",
          "semi-bold-heading-h1-font-size": "24px",
          "regular-h2-font-size": "20px",
          "regular-h4-font-size": "12px",
          "medium-h4-font-size": "12px",
          "medium-h2-font-size": "20px",
        },
        fontWeight: {
          "medium-h3-font-weight": "500",
          "regular-h3-font-weight": "400",
          "semi-bold-heading-h1-font-weight": "600",
          "regular-h2-font-weight": "400",
          "regular-h4-font-weight": "400",
          "medium-h4-font-weight": "500",
          "medium-h2-font-weight": "500",
        },
        lineHeight: {
          "medium-h3-line-height": "19px",
          "regular-h3-line-height": "19px",
          "semi-bold-heading-h1-line-height": "28px",
          "regular-h2-line-height": "23px",
          "regular-h4-line-height": "14px",
          "medium-h4-line-height": "14px",
          "medium-h2-line-height": "23px",
        },
        letterSpacing: {},
        borderRadius: {},
        colors: {
          "secondary-color-secondary-light": "#eeeeee",
          "primary-color-primary-dark": "#e00019",
          "action-color-information": "#023668",
          "default-color-white": "#ffffff",
          "default-color-black": "#000000",
          "secondary-color-secondary-dark": "#5f5f5f",
          "gray-color-gray-800": "#212529",
          "primary-color-primary": "#f60621",
          "action-color-warning": "#ffc107",
          "action-color-success": "#28a745",
          "secondary-color-secondry": "#999999",
          "gray-color-gray-200": "#e9ecef",
          "action-color-danger": "#f60621",
          "grayscale-white": "#ffffff",
        },
        spacing: {},
        width: {},
        minWidth: {},
        maxWidth: {},
        height: {},
        minHeight: {},
        maxHeight: {},
      },
    },
  };
  