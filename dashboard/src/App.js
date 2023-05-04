import logo from './logo.ico';
import './App.css';
import {Pie} from 'react-chartjs-2';


function App() {
    return (
        <div className="App">
            <header className="App-header">
                {/* CREATE INITIAL LANDING PAGE */}
                <img src={logo} className="App-logo" alt="logo"/><br/><br/><br/>
                <button className="App-button">CONTINUE</button>
            </header>

            {/* CREATE BUTTON TO GO DOWNN ON LANDING PAGE */}
            <div className="App-body">

                {/* CREATE SECOND PAGE */}
                <div className="App-second">
                    {/* CREATE A PIE CHART WIDGET */}
                </div>
            </div>
        </div>
    );
}

export default App;
