import './bootstrap';
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDh5Fkz3JFwGg63WeB2tIJCiiXSJwE_ctA",
  authDomain: "sispatri-4688f.firebaseapp.com",
  projectId: "sispatri-4688f",
  storageBucket: "sispatri-4688f.firebasestorage.app",
  messagingSenderId: "397532736378",
  appId: "1:397532736378:web:7ac8a66bd7202212e084c3",
  measurementId: "G-HN00GJJFRW"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);