<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>XML - EDITOR</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="sl-vue-tree-master/dist/sl-vue-tree-dark.css">
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
  <script src="sl-vue-tree-master/dist/sl-vue-tree.js"></script>
  <link rel="stylesheet" href="dist/fontawesome-5.11.2/css/all.min.css">
</head>

<body>

  <div id="app" @click="contextMenuIsVisible = false" class="container">

    <h1>XML - EDITOR</h1>

    <div class="row">
      <div class="col col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col col-md-6">
                <form class="form-inline">
                  <div class="form-group mb-2">
                    <select v-model="data_folder_selected" class="form-control" @change="folderSelectChange($event)">
                      <option v-for="folder in data_folders" v-bind:value="folder">
                        {{ folder }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <select v-model="data_menu_selected" class="form-control" @change="menuSelectChange($event)">
                      <option v-for="menu in data_menus" v-bind:value="menu">
                        {{ menu }}
                      </option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary mb-2" @click="refresh_xml()" style="float: right;">
                    <i class="fas fa-sync"></i> Refresh
                  </button>
                </form>
              </div>
              <div class="col col-md-6">
                <button type="button" class="btn btn-primary mb-2" @click="simpan_xml()" style="float: right;">
                  <i class="fas fa-save"></i> Simpan Perubahan
                </button>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>



    <div class="row">
      <div class="col col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-inline">
              <div class="form-group mb-2">
                <input v-model="input_tambah_menu" v-on:keyup.enter="input_tambah_menu_enter" class="form-control" placeholder="Tambah Menu">
              </div>
            </div>
            <div class="tree-container">
              <sl-vue-tree v-model="nodes" ref="slVueTree" :allow-multiselect="false" @select="nodeSelected" @drop="nodeDropped" @toggle="nodeToggled" @nodecontextmenu="showContextMenu">

                <template slot="title" slot-scope="{ node }">
                  <span class="item-icon">
                    <i v-bind:class="node.data.i"></i>
                  </span>

                  {{ node.data.n }}
                </template>


                <template slot="toggle" slot-scope="{ node }">
                  <span v-if="!node.isLeaf">
                    <i v-if="node.isExpanded" class="fa fa-chevron-down"></i>
                    <i v-if="!node.isExpanded" class="fa fa-chevron-right"></i>
                  </span>
                </template>


                <!-- <template slot="sidebar" slot-scope="{ node }">
              <span class="visible-icon" @click="event => toggleVisibility(event, node)">
                <i v-if="!node.data || node.data.visible !== false" class="fa fa-eye"></i>
                <i v-if="node.data && node.data.visible === false" class="fa fa-eye-slash"></i>
              </span>
            </template> -->


                <template slot="draginfo">
                  {{selectedNodesTitle}}
                </template>

              </sl-vue-tree>
            </div>
            <div class="contextmenu" ref="contextmenu" v-show="contextMenuIsVisible">
              <div @click="ganti_jadi_multi_menu">Multi Menu</div>
              <div @click="removeNode">Remove</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col col-md-6">
        <div class="card">
          <div class="card-body">
            <form v-if="selected_menu">
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" placeholder="Nama" v-model="selected_menu.data.n">
              </div>
              <div class="form-group">
                <label>Link</label>
                <div class="input-group">
                  <input class="form-control" placeholder="Link" v-model="selected_menu.data.l">
                  <button class="btn btn-primary" type="button" @click="set_link()"><i class="fas fa-sync"></i> Set Halaman Admin </button>
                </div>
              </div>
              <div class="form-group">
                <label>Icon</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i id="IconPreview" v-bind:class="selected_menu.data.i"></i></div>
                  </div>
                  <input class="form-control" placeholder="Icon" v-model="selected_menu.data.i" id="icon-picker">
                  <button class="btn btn-primary" type="button" @click="ganti_icon()">Ganti</button>
                </div>
              </div>

              <div class="form-group" v-for="item in Object.keys(selected_menu.data)" :key="item" v-if="!['n', 'l', 'i', 'id', 's', 't'].includes(item)">
                <label>{{ item }}</label>
                <input class="form-control" :placeholder="item" v-model="selected_menu.data[item]">
              </div>


              <!-- <button type="button" class="btn btn-primary" @click="simpan_data_menu()">Save</button> -->
            </form>
          </div>
        </div>
      </div>

    </div>

    <!-- <div class="row">
      <div class="col col-md-6">
        <div class="card">
          <div class="card-body">
            <pre>{{ JSON.stringify(nodes, null, 4)}}</pre>
          </div>
        </div>
      </div>
      <div class="col col-md-6">
        <div class="card">
          <div class="card-body">
            <pre>{{ xml }}</pre>
          </div>
        </div>
      </div>
    </div> -->

    <div class="modal fade" id="link_modal" tabindex="-1" aria-labelledby="link_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="exampleModalXlLabel">
              Halaman Admin
              <input type="text" class="form-control" v-model="cari_halaman_value">
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col col-md-4" v-for="page in cari_halaman(cari_halaman_value)" :key="page.link" style="margin-bottom: 5px;">
                {{page.nama}}
                <a :href="page.preview_link" target="_blank">Lihat</a>
                <div class="btn btn-primary" style="float: right;" @click="pilih_link(page.link)">Pilih</div>
                <!-- <div class="embed-responsive embed-responsive-21by9">
                  <iframe class="embed-responsive-item" :src="page.preview_link"></iframe>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="link_ganti_icon" tabindex="-1" aria-labelledby="link_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="exampleModalXlLabel">
              Pilih Icon
              <input type="text" class="form-control" v-model="data_icon_search_value">
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col col-md-12">
                <!-- <font  data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                  <i v-bind:class="icon" @click="data_icon_pilih(icon)"></i>
                </font> -->
                <button style="font-size: 1.5em;" v-for="(icon, index) in data_icon_search(data_icon_search_value)" :key="index" type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" :title="icon">
                  <i v-bind:class="icon" @click="data_icon_pilih(icon)"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    new Vue({
      el: '#app',
      components: {
        SlVueTree
      },
      data: function() {
        return {
          nodes: [],
          contextMenuIsVisible: false,
          selectedNodesTitle: '',
          data_menus: [],
          data_menu_selected: null,
          data_folders: [],
          data_folder_selected: null,
          selected_menu: null,
          xml: "",
          input_tambah_menu: "",
          halaman_admins: [],
          cari_halaman_value: "",
          data_icons: [],
          data_icon_search_value: ""
        }
      },

      mounted() {
        // expose instance to the global namespace
        window.slVueTree = this.$refs.slVueTree;
        window.vuee = this;
        this.fetch_menu_file();
        this.fetch_folder();
      },

      watch: {
        'nodes': {
          handler: function(val, oldVal) {
            this.ubah_ke_xml(val);
          },
          deep: true
        }
      },

      methods: {

        data_icon_search(search) {
          return Object.values(this.data_icons).filter(icon => icon.toLowerCase().includes(search));
        },

        data_icon_pilih(icon) {
          this.selected_menu.data.i = icon;
          $('#link_ganti_icon').modal('hide');
        },

        ganti_icon() {
          $('#link_ganti_icon').modal('show');
          fetch("dist/iconpicker-1.5.0.json")
            .then(response => response.json())
            .then(data => {
              this.data_icons = data;
            })
        },

        cari_halaman(search) {
          return this.halaman_admins.filter(halaman => {
            return halaman.nama.toLowerCase().includes(search);
          });
        },

        pilih_link(link) {
          $('#link_modal').modal('hide');
          this.selected_menu.data.l = link
        },

        set_link() {
          this.fetch_halaman_admin();
          $('#link_modal').modal('show');
        },

        fetch_halaman_admin() {
          fetch(`halaman_admin.php`)
            .then(response => response.json())
            .then(data => {
              this.halaman_admins = data
            });
        },

        refresh_xml() {
          this.selected_menu = null;
          this.fetch_menu_file();
          this.fetchMenu();
        },

        fetch_menu_file() {
          fetch(`menu_file.php?folder=${this.data_folder_selected}`)
            .then(response => response.json())
            .then(data => {
              this.data_menus = data
            });
        },

        fetch_folder() {
          fetch('folder.php')
            .then(response => response.json())
            .then(data => {
              this.data_folders = data;
              this.data_menus = [];
              this.data_menu_selected = null;
              this.fetch_menu_file();
            });
        },

        simpan_xml() {
          let formData = new FormData();
          formData.append('xml', this.xml);
          formData.append('menu', this.data_menu_selected);
          formData.append('folder', this.data_folder_selected);
          fetch('simpan_ke_xml.php', {
              method: 'POST',
              body: formData,
            }).then(response => response.text())
            .then(data => {
              alert("Berhasil disimpan");
            });
        },

        input_tambah_menu_enter() {
          this.nodes.push({
            "isLeaf": true,
            "data": {
              "id": "",
              "s": "0",
              "t": "s",
              "n": this.input_tambah_menu,
              "l": "",
              "i": "fa fa-home"
            }
          }, );
          this.input_tambah_menu = "";
        },

        ubah_ke_xml(nodes) {
          fetch('ubah_ke_xml.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(nodes),
            }).then(response => response.text())
            .then(data => {
              this.xml = data;
            });
        },

        fetchMenu: function() {
          this.nodes = [];
          fetch(`menu_data.php?menu=${this.data_menu_selected}&folder=${this.data_folder_selected}`)
            .then(response => response.json())
            .then(data => {
              this.nodes = data
            });
        },


        simpan_data_menu: function() {
          let index = this.nodes.findIndex(x => x.isSelected);
          // console.log(this.selected_menu);
          // this.nodes[index] = this.selected_menu;
        },

        menuSelectChange: function(event) {
          this.fetchMenu();
        },

        folderSelectChange: function(event) {
          this.fetchMenu();
        },

        toggleVisibility: function(event, node) {
          const slVueTree = this.$refs.slVueTree;
          event.stopPropagation();
          const visible = !node.data || node.data.visible !== false;
          slVueTree.updateNode(node.path, {
            data: {
              visible: !visible
            }
          });
        },

        nodeSelected(nodes, event) {
          this.selectedNodesTitle = nodes.map(node => node.data.n).join(', ');
          this.selected_menu = nodes[0];
        },

        nodeToggled(node, event) {},

        nodeDropped(nodes, position, event) {},

        showContextMenu(node, event) {
          event.preventDefault();
          this.contextMenuIsVisible = true;
          const $contextMenu = this.$refs.contextmenu;
          $contextMenu.style.left = event.clientX + 'px';
          $contextMenu.style.top = event.clientY + 'px';
        },

        ganti_jadi_multi_menu() {
          this.contextMenuIsVisible = false;
          let index = this.nodes.findIndex(x => x.isSelected);
          this.nodes[index].isLeaf = this.nodes[index].isLeaf == true ? false : true;
          this.selected_menu.isLeaf = this.selected_menu.isLeaf == true ? false : true;

          if (this.nodes[index]['children'] == null) {
            this.nodes[index]['children'] = []
          }

        },

        removeNode() {
          this.contextMenuIsVisible = false;
          const $slVueTree = this.$refs.slVueTree;
          const paths = $slVueTree.getSelected().map(node => node.path);
          $slVueTree.remove(paths);
        }
      }
    })
  </script>

  <style>
  body {
    background: #050d12;
    font-family: Arial, sans-serif;
    color: #ffffff !important;
  }

  a {
    color: #bbb;
  }

  .row {
    display: flex;
    margin-bottom: 10px;
  }

  .contextmenu {
    position: absolute;
    background-color: white;
    color: black;
    border-radius: 2px;
    cursor: pointer;
  }

  .contextmenu>div {
    padding: 10px;
  }

  .contextmenu>div:hover {
    background-color: rgba(100, 100, 255, 0.5);
  }

  .last-event {
    color: white;
    background-color: rgba(100, 100, 255, 0.5);
    padding: 10px;
    border-radius: 2px;
  }

  .tree-container {
    flex-grow: 1;
  }

  .sl-vue-tree.sl-vue-tree-root {
    flex-grow: 1;
    overflow-x: hidden;
    overflow-y: auto;
    /* height: 300px; */
  }

  .json-preview {
    flex-grow: 1;
    margin-left: 10px;
    background-color: #13242d;
    border: 1px solid black;
    padding: 10px;
  }

  .item-icon {
    display: inline-block;
    text-align: left;
    width: 20px;
  }
</style>


</body>

</html>