<template>
    <div v-show="show" class="overlay">
        <div class="dialog">
            <div class="dialog__content">
                <h2 class="dialog__title" v-text="title"></h2>
                <p class="dialog__description" v-text="description"></p>
            </div>

            <hr />

            <div class="dialog__footer">
                <button
                    @click.prevent="confirm"
                    class="dialog__confirm"
                    v-text="btnText"
                ></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DialogBox",
    props: ["show", "title", "description", "confirm", "btnText"],
};
</script>

<style lang="scss" scoped>
.overlay {
    --tw-bg-opacity: 1;
    background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
    --tw-bg-opacity: 0.5;
    height: 100%;
    position: fixed;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    width: 100%;
    z-index: 10;

    .dialog {
        --tw-bg-opacity: 1;
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 0.75rem;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2.5rem;
        max-width: 100%;
        width: 24rem;

        .dialog__content {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            padding-top: 1rem;
            padding-bottom: 1rem;

            .dialog__title {
                font-weight: 500;
                font-size: 1.125rem;
                line-height: 1.75rem;
                margin-bottom: 0.5rem;
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            .dialog__description {
                font-size: 0.875rem;
                line-height: 1.25rem;
                margin-bottom: 1rem;
                --tw-text-opacity: 1;
                color: rgba(107, 114, 128, var(--tw-text-opacity));
            }
        }

        .dialog__footer {
            display: flex;
            justify-content: flex-end;
            padding-top: 1rem;
            padding-bottom: 1rem;

            .dialog__confirm {
                --tw-bg-opacity: 1;
                background-color: rgba(226, 254, 231, var(--tw-bg-opacity));
                border-radius: 0.75rem;
                font-weight: 500;
                margin-right: 1rem;
                padding: 0.75rem 1rem;

                --tw-text-opacity: 1;
                color: rgba(1, 173, 49, var(--tw-text-opacity));
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;

                &:focus {
                    outline: 2px solid transparent;
                    outline-offset: 2px;
                }

                &:hover {
                    --tw-bg-opacity: 1;
                    background-color: rgba(165, 252, 194, var(--tw-bg-opacity));
                    --tw-text-opacity: 1;
                    color: rgba(27, 153, 44, var(--tw-text-opacity));
                }
            }
        }
    }
}
</style>
