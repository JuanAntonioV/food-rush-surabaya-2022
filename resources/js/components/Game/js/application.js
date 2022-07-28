import GameManager from "./game_manager";
import KeyboardInputManager from "./keyboard_input_manager";
import HTMLActuator from "./html_actuator";
import LocalStorageManager from "./local_storage_manager";

// Wait till the browser is ready to render the game (avoids glitches)
window.requestAnimationFrame(function () {
    new GameManager(4, KeyboardInputManager, HTMLActuator, LocalStorageManager);
});
