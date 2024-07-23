package library

import (
	"reflect"
	"testing"
)

func TestMusicManager_Add(t *testing.T) {
	type fields struct {
		musics []MusicEntry
	}
	type args struct {
		music *MusicEntry
	}
	tests := []struct {
		name   string
		fields fields
		args   args
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			m := &MusicManager{
				musics: tt.fields.musics,
			}
			m.Add(tt.args.music)
		})
	}
}

func TestMusicManager_Find(t *testing.T) {
	type fields struct {
		musics []MusicEntry
	}
	type args struct {
		name string
	}
	tests := []struct {
		name   string
		fields fields
		args   args
		want   *MusicEntry
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			m := &MusicManager{
				musics: tt.fields.musics,
			}
			if got := m.Find(tt.args.name); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("Find() = %v, want %v", got, tt.want)
			}
		})
	}
}

func TestMusicManager_Get(t *testing.T) {
	type fields struct {
		musics []MusicEntry
	}
	type args struct {
		index int
	}
	tests := []struct {
		name      string
		fields    fields
		args      args
		wantMusic *MusicEntry
		wantErr   bool
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			m := &MusicManager{
				musics: tt.fields.musics,
			}
			gotMusic, err := m.Get(tt.args.index)
			if (err != nil) != tt.wantErr {
				t.Errorf("Get() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(gotMusic, tt.wantMusic) {
				t.Errorf("Get() gotMusic = %v, want %v", gotMusic, tt.wantMusic)
			}
		})
	}
}

func TestMusicManager_Len(t *testing.T) {
	type fields struct {
		musics []MusicEntry
	}
	tests := []struct {
		name   string
		fields fields
		want   int
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			m := &MusicManager{
				musics: tt.fields.musics,
			}
			if got := m.Len(); got != tt.want {
				t.Errorf("Len() = %v, want %v", got, tt.want)
			}
		})
	}
}

func TestMusicManager_Remove(t *testing.T) {
	type fields struct {
		musics []MusicEntry
	}
	type args struct {
		index int
	}
	tests := []struct {
		name   string
		fields fields
		args   args
		want   *MusicEntry
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			m := &MusicManager{
				musics: tt.fields.musics,
			}
			if got := m.Remove(tt.args.index); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("Remove() = %v, want %v", got, tt.want)
			}
		})
	}
}

func TestNewMusicManager(t *testing.T) {
	tests := []struct {
		name string
		want *MusicManager
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewMusicManager(); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewMusicManager() = %v, want %v", got, tt.want)
			}
		})
	}
}

func TestOps(t *testing.T) {
	mm := NewMusicManager()
	if mm == nil {
		t.Error("NewMusicManager failed.")
	}
	if mm.Len() != 0 {
		t.Error("NewMusicManager failed, not empty.")
	}
	m0 := &MusicEntry{
		"1", "My Heart Will Go On", "Celion Dion", "Pop",
		"http://qbox.me/24501234", "MP3"}
	mm.Add(m0)
	if mm.Len() != 1 {
		t.Error("MusicManager.Add() failed.")
	}
	m := mm.Find(m0.Name)
	if m == nil {
		t.Error("MusicManager.Find() failed.")
	}
	if m.Id != m0.Id || m.Artist != m0.Artist ||
		m.Name != m0.Name || m.Genre != m0.Genre ||
		m.Source != m0.Source || m.Type != m0.Type {
		t.Error("MusicManager.Find() failed. Found item mismatch.")
	}
	m, err := mm.Get(0)
	if m == nil {
		t.Error("MusicManager.Get() failed.", err)
	}
	m = mm.Remove(0)
	if m == nil || mm.Len() != 0 {
		t.Error("MusicManager.Remove() failed.", err)
	}
}
