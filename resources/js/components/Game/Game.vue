<template>
    <div class="containers_game">
        <div class="heading">
            <div class="scores-container">
                <div class="score-container text-dark">0</div>
                <div class="best-container text-dark">0</div>
            </div>
        </div>

        <div class="game-container">
            <div class="game-message">
                <p></p>
                <div class="lower">
                    <a class="keep-playing-button">Keep going</a>
                    <a class="retry-button">Try again</a>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
            </div>

            <div class="tile-container"></div>
        </div>

        <div class="above-game">
            <a class="restart-button text-white">New Game</a>
        </div>

        <p class="game-explanation">
            <strong class="important">How to play:</strong> Use your
            <strong>arrow keys</strong> to move the tiles. When two tiles with
            the same number touch, they <strong>merge into one!</strong>
        </p>
    </div>
</template>

<script>
import "./js/bind_polyfill.js";
import "./js/classlist_polyfill.js";
import "./js/animframe_polyfill.js";
import "./js/application.js";

export default {
    name: "Game",
};
</script>

<style src="./style/main.css"></style>
