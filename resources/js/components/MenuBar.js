import * as React from 'react';
import CssBaseline from '@mui/material/CssBaseline';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import Navbar from './Navbar';
import Footer from './Footer';
import Hero from './Hero';
import CardGrid from './CardGrid';

const theme = createTheme();

export default function MenuBar() {
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <Navbar/>
      <main>
        {/* Hero unit */}
       <Hero/>
        <CardGrid/>
      </main>
      {/* Footer */}
      <Footer/>
      {/* End footer */}
    </ThemeProvider>
  );
}