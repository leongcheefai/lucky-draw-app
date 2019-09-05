<template>
  <div class="container">
    <div class="row justify-content-center">
      <div>
        <div class="ui card winning-number-card">
          <div class="content">
            <div class="header">Welcome to {{ appTitle }}</div>
          </div>
          <form class="content ui form" method="post" action="/winning_number">
          <input type="hidden" name="_token" :value="csrf">
            <div class="field">
              <label for>Name</label>
              <input type="text" name="name" placeholder="Name" />
            </div>
            <div class="field">
              <label for>Winning Number</label>
              <div v-for="(input, index) in winning_numbers" v-bind:key="index" class="ui grid">
                <div class="eleven wide column">
                  <input type="text" name="value[]" placeholder="Numbers" maxlength="4" />
                </div>
                <div class="two wide column">
                  <button class="ui button red" type="button" v-on:click="removeRow(index)">Remove</button>
                </div>
              </div>
            </div>
            <button
              class="fluid ui green button btn-more"
              v-on:click="addNumberInput"
              type="button"
            >More...</button>
            <button class="fluid ui button basic primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["appTitle"],
  data: function() {
    return {
      name: "",
      winning_numbers: [
        {
          value: ""
        }
      ],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
  },
  methods: {
    addNumberInput: function() {
      this.winning_numbers.push({
        value: ""
      });
    },
    removeRow: function(index) {
      this.winning_numbers.splice(index, 1);
    }
  }
};
</script>
