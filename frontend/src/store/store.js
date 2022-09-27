import {
    configureStore
} from '@reduxjs/toolkit';
import authReducer from '../Reducers/AuthSlice';



const saveToLocalStorage = (state) => {
    try {
        const data = JSON.stringify(state);
        localStorage.setItem('persistantState', data);
    } catch (e) {
        console.warn(e);
    }
}

const loadFromLocalStorage = () => {
    try {
        const serializedState = localStorage.getItem('persistantState');

        if (serializedState === null) return undefined;

        return JSON.parse(serializedState);
    } catch (e) {
        console.warn(e);
    }
}


const store = configureStore({
    reducer: {
        auth: authReducer
    },
    preloadedState: loadFromLocalStorage()
});


store.subscribe(() => saveToLocalStorage(store.getState()));

export default store;