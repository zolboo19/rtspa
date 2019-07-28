<template>
      <v-card class="mt-2">
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
                <router-link :to="data.path">
                    {{ data.title }}
                </router-link>
            </h3>
            <div class="grey--text">{{ data.user }} нэртэй хэрэглэгч {{ data.created_at }} хэлсэн.</div>
          </div>
        </v-card-title>

        <v-card-text>
            {{ data.body }}
        </v-card-text>
      </v-card>
</template>

<script>
export default {
    props:['data']

}
</script>

<style>

</style>
