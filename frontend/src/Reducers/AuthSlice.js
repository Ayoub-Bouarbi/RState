import { createSlice } from '@reduxjs/toolkit';

export const authSlice = createSlice({
    name: 'Auth',
    initialState: {
        user: null,
        isLoggedIn: false
    },
    reducers: {
        setLogIn: (state, action) => {
            state.user = action.payload.user;
            state.isLoggedIn = true;
        },
        setLogOut: (state) => {
            state.user = null;
            state.isLoggedIn = false;
        }
    }
})

export const {
    setLogIn,
    setLogOut
} = authSlice.actions;

export default authSlice.reducer;