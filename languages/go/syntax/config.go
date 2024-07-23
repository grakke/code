package main

import (
	"encoding/json"
	"io/ioutil"

	"github.com/BurntSushi/toml"
	"github.com/go-ini/ini"
	"gopkg.in/ini.v1"
	"gopkg.in/yaml.v2"
)

func getValue() {

	// json文件
	buf, _ := ioutil.ReadFile(path)
	myConfig := &MyConfig{} //对应json中的k-v项
	_ = json.Unmarshal(buf, myConfig)

	// ini文件
	myConfig := &MyConfig{} //对应ini中的k-v项
	err := ini.MapTo(myConfig, "config.ini")

	// 另一种常用来读ini文件：
	cfg, _ := ini.Load(path)
	cfg.Section("").Key("app_mode").String()                 //read
	cfg.Section("section_name").Key("port").SetValue("8086") //write
	cfg.SaveTo(path)

	// yaml文件
	myConfig := &MyConfig{} //对应ini中的k-v项
	file, err := ioutil.ReadFile("config.yaml")
	err = yaml.Unmarshal(file, myConfig)

	// toml文件
	myConfig := &MyConfig{} //对应yaml中的k-v项
	toml.DecodeFile("config.toml", myConfig)
}
