import * as React from "react";
import {AppBar, Toolbar, Typography} from '@mui/material'
import CameraIcon from '@mui/icons-material/PhotoCamera';


export default function Navbar() {
    return (
        <AppBar position="relative">
            <Toolbar>
                {/* <CameraIcon sx={{ mr: 2 }} /> */}
                <Typography variant="h6" color="inherit" noWrap>
                    MamaSafi
                </Typography>
            </Toolbar>
        </AppBar>
    );
}
