<template>
    <div
        class="username-avatar__container"
        :class="customClass"
    >
        <img :src="avatar">
    </div>
</template>

<script>
    export default {
        name: 'UserNameAvatar',
        props: {
            avatar: String,
            customClass: String
        }
    }
</script>
