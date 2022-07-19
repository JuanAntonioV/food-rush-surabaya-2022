<template>
    <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Loading",
};
</script>

<style lang="scss" scoped>
.gooey {
    position: absolute;
    top: 55%;
    left: 55%;
    translate: translate(-55%, -55%);
    width: 142px;
    height: 40px;
    margin: -20px 0 0 -71px;
    background: white;
    filter: contrast(20);

    .dot {
        position: absolute;
        width: 13px;
        height: 13px;
        top: 12px;
        left: 15px;
        filter: blur(4px);
        background: #000;
        border-radius: 50%;
        transform: translateX(0);
        animation: dot 2.8s infinite;
    }
    .dots {
        transform: translateX(0);
        margin-top: 12px;
        margin-left: 31px;
        animation: dots 2.8s infinite;

        span {
            display: block;
            float: left;
            width: 14px;
            height: 14px;
            margin-left: 16px;
            filter: blur(4px);
            background: #000;
            border-radius: 50%;
        }
    }

    @keyframes dot {
        50% {
            transform: translateX(96px);
        }
    }
    @keyframes dots {
        50% {
            transform: translateX(-31px);
        }
    }
}
</style>
